<template>
  <nav class="navbar navbar-dark bg-user navbar-expand-md bg-faded justify-content-center">
    <router-link to="/" class="navbar-brand d-flex w-50 mr-auto">Permut</router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#collapsingNavbar3"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
      <ul class="navbar-nav w-100 justify-content-center">
        <li class="nav-item">
          <router-link class="nav-link" to="/">Página inicial</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/profile" class="nav-link">Meu perfil</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/messages" class="nav-link">Mensagens</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/search" class="nav-link">Pesquisar</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/payment" class="nav-link">Premium</router-link>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-bell"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" @click.prevent="logout" href="#">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$store.commit("logoutUser");
      this.$router.push("/login");
    }
  }
};
</script>