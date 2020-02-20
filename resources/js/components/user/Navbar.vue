<template>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        
        <div class="navbar-brand col-sm-3 col-md-2 mr-0 d-flex align-items-center custom-brand">
            <img v-if="currentUser" :src="currentUser.avatar || '\\img\\noPerson.png' " alt="avatar" width="20" height="20" class="mr-2">
            <!-- {{user_name}} -->
            <!-- first name -->
            <div v-if="currentUser">{{currentUser.name}}</div>
        </div>
      <ul class="navbar-nav px-3" >
        <li class="nav-item text-nowrap mx-1">
          <a class="nav-link" href="#" @click.prevent="logout">
            <i class="fa fa-sign-out"></i>  
            Sair</a>
        </li>
      </ul>
    </nav>
</template>

<script>
export default {
  methods: {

    logout() {
      this.$store.commit("logoutUser");
      this.$router.push("/login");
    }
  },
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }
};
</script>