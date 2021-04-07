<template>
  <div
    v-if="message.user.id == user.id && message.user.name == user.name"
    class="bg-blue-600 text-white font-light m-1 py-1 px-2 max-w-2xl float-right rounded-md"
  >
    {{ message.message }}
  </div>
  <div
    v-else
    class="black-white font-light m-1 py-1 px-2 max-w-2xl bg-red-400 rounded-md"
  >
    {{ message.user.name }}: {{ message.message }}
  </div>
</template>

<script >
export default {
  props: ["message", "user"],
  created() {},
  mounted() {
    console.log("finnally");
    console.log(this.user);
  },
};
</script>