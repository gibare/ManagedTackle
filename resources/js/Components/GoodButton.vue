<template>
  <slot/>
  <button @click="Good(tackle.id)">いいね</button>
</template>

<script>
  export default {
    data() {
      return {
        tackle: {},
      };
    },
  };
</script>