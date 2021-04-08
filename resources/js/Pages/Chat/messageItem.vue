<template>
  <div
    v-if="message.user.id == user.id && message.user.name == user.name"
    class="bg-blue-600 text-white font-light m-1 py-1 px-2 max-w-2xl shadow-md float-right rounded-md flex flex-row-reverse items-center"
  >
    <p class="bg-white text-black rounded-full p-1 mx-1">you</p>
    {{ message.message }}
  </div>
  <div
    v-else
    class="black-white font-light m-1 py-1 px-2 max-w-2xl bg-red-400 shadow-md rounded-md flex items-center"
  >
    <p class="bg-white text-black rounded-sm p-1 mx-1">
      {{ message.user.name }}
    </p>
    : {{ message.message }}
  </div>
</template>

<script >
export default {
  props: ["message", "user"],
  created() {},
  mounted() {},
};
</script>