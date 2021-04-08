<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <chat-room-selection
          v-if="currentRoom.id"
          :rooms="chatRooms"
          :currentRoom="currentRoom"
          v-on:roomchaged="setRoom"
        />
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <message-container :messages="messages" :user="user" />
          <input-message :room="currentRoom" v-on:messagesent="getMessages()" />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import MessageContainer from "./messageContainer.vue";
import InputMessage from "./inputMessage.vue";
import ChatRoomSelection from "./chatRoomSelection.vue";
export default {
  props: ["user"],
  components: {
    AppLayout,
    MessageContainer,
    InputMessage,
    ChatRoomSelection,
  },
  data() {
    return {
      chatRooms: [],
      currentRoom: [],
      messages: [],
    };
  },
  created() {
    this.getRooms();
  },
  watch: {
    currentRoom(val, oldVal) {
      if (oldVal.id) {
        console.log("detaching");
        this.disconnect(oldVal);
      }
      this.connect();
    },
  },
  methods: {
    connect() {
      if (this.currentRoom.id) {
        let vm = this;
        console.log("before connect");
        this.getMessages();
        window.Echo.private("chat." + this.currentRoom.id).listen(
          ".message.new",
          (e) => {
            vm.getMessages();
          }
        );
      }
    },
    disconnect(room) {
      console.log("here but not ditaching");
      window.Echo.leave("chat." + room.id);
    },
    getRooms() {
      axios
        .get("/chat/rooms")
        .then((response) => {
          this.chatRooms = response.data;
          this.setRoom(response.data[0]);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    setRoom(room) {
      this.currentRoom = room;
    },
    getMessages() {
      axios
        .get("/chat/room/" + this.currentRoom.id + "/messages")
        .then((response) => {
          this.messages = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    // console.log("mounted user");
    // console.log(this.user);
  },
};
</script>