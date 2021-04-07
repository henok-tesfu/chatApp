<template>
  <div class="grid grid-cols-2">
    <div class="font-bold text-xl">{{ selected.name }} chat</div>
    <div>
      <select
        v-model="selected"
        @change="$emit('roomchaged', selected)"
        class="float-right bg-gray-700 text-white font-light outline-none focus:outline-none rounded-sm"
      >
        <option v-for="(room, index) in rooms" :key="index" :value="room">
          {{ room.name }}
        </option>
      </select>
    </div>
  </div>
</template>

<script >
export default {
  props: ["rooms", "currentRoom"],
  data() {
    return {
      selected: "",
    };
  },
  created() {
    this.selected = this.currentRoom;
  },
};
</script>