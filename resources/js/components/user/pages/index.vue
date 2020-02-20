<template>
  <div>
    <Navbar />
    <Main />
  </div>
</template>

<script>

import Navbar from "../Navbar.vue";
import Main from "../Main.vue";

export default {
  components: { Navbar, Main },

  mounted() {
    this.$store.dispatch("fetchUser");
  },
  methods: {},
  
};
</script>
