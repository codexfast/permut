<template>
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
      <form class="form-signin text-center" @submit.prevent="authenticate">
        <img
          class="mb-4"
          src="https://getbootstrap.com//docs/4.4/assets/brand/bootstrap-solid.svg"
          alt
          width="72"
          height="72"
        />
        <h1 class="h3 mb-3 font-weight-normal">Área de Login</h1>

        <label for="inputEmail" class="sr-only">E-mail</label>
        <input
          type="email"
          id="inputEmail"
          class="form-control"
          placeholder="E-mail"
          required
          v-model="form.email"
          autofocus
        />

        <label for="inputPassword" class="sr-only">Senha</label>
        <input
          type="password"
          id="inputPassword"
          class="form-control"
          placeholder="Senha"
          required
          v-model="form.password"
        />

        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Login</button>
        <router-link to="/admin/reset-password" class="btn btn-link btn-block">Esquceu a Senha?</router-link>
        <hr />
      </form>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
import { setAuthorizationAdmin } from "../../../../helpers/general_admin";
export default {
  name: "login",
  created() {},
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    authenticate() {
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        loader: "dots",
        color: "#007bff"
      });
      axios
        .post("/admin/login", this.form)
        .then(response => {
          if (response.data.success) {
            setAuthorizationAdmin(response.data.token);
            this.$store.commit("loginAdminSuccess", response.data);
            this.$router.push({ path: "/admin" });
            this.$notice["success"]({
              title: `Login`,
              description: `Seja bem-vindo  ${response.data.user.name}`
            });
          } else {
            Swal.fire("Erro!", `${response.data.message}`, "error");
          }
        })
        .catch(error => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {
          loader.hide();
        });
    }
  }
};
</script>