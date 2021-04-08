<template>
  <div class="relative h-10 m-1">
    <div class="w-full grid grid-cols-6">
      <input
        v-model="message"
        @keydown.enter="sendMessage"
        placeholder="something....."
        type="text"
        class="col-span-6 outline-none rounded-tl-2xl rounded-bl-2xl"
      />
      <button
        @click="sendMessage"
        class="place-self-start absolute right-1 m-1 outline-none bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white"
      >
        send
      </button>
    </div>
  </div>
</template>

<script >
export default {
  props: ["room"],
  data() {
    return {
      message: "",
    };
  },
  methods: {
    sendMessage() {
      if (this.message == "") return;
      axios
        .post("/chat/room/" + this.room.id + "/message", {
          message: this.message,
        })
        .then((response) => {
          if (response.status == 201) this.message = "";
          this.$emit("messagesent");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>