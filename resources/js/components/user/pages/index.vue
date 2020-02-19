<template>
  <div>
    <Header />
    <div v-if="currentUser">{{currentUser.name}}</div>
  </div>
</template>

<script>
import Header from "../Header.vue";
export default {
  components: { Header },

  mounted() {
    this.$store.dispatch("fetchUser");
  },
  methods: {},
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }
};
</script>
