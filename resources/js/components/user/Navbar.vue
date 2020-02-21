<template>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        
        <div class="navbar-brand col-sm-3 col-md-2 mr-0 d-flex align-items-center custom-brand">
            <img v-if="currentUser" :src="currentUser.avatar || '\\img\\noPerson.png' " alt="avatar" width="20" height="20" class="mr-2">
            <!-- {{user_name}} -->
            <!-- first name -->
            <div v-if="currentUser">{{currentUser.name}}</div>
        </div>
      <ul class="navbar-nav px-3 d-flex flex-row">
        <li class="nav-item text-nowrap mx-1" v-show="!isMobile()">
          <a class="nav-link" href="#" @click.prevent="toggle">
            <i class="fa fa-desktop"></i>
            Fullscreen
            </a>
        </li>
        <li class="nav-item text-nowrap mx-1">
          <a class="nav-link" href="#" @click.prevent="logout">
            <i class="fa fa-sign-out"></i>  
            Sair</a>
        </li>
      </ul>
    </nav>
</template>

<script>
  import fullscreen from 'vue-fullscreen'
  import Vue from 'vue'
  Vue.use(fullscreen)
export default {
    methods: {
      toggle () {
        this.$fullscreen.toggle()
      },
      fullscreenChange (fullscreen) {
        this.fullscreen = fullscreen
      },
      isMobile() {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          return true
        } else {
          return false
        }
    },
    logout() {
      this.$store.commit("logoutUser");
      this.$router.push("/login");
    },
  },
  
  data() {
    return {
      fullscreen: false
    }
  },

  
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }

}

</script>