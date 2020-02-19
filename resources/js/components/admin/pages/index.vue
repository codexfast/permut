<template>
  <div>
    <Header />
    <div v-if="currentAdmin">{{currentAdmin.name}}</div>
  </div>
</template>

<script>
import Header from "../Header.vue";
export default {
  components: { Header },

  mounted() {
    this.$store.dispatch("fetchAdmin");
  },
  methods: {},
  computed: {
    currentAdmin() {
      return this.$store.getters.currentAdmin;
    }
  }
};
</script>
