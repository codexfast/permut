<template>
  <form class="form-signin" @submit.prevent="authenticate">
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

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <button class="btn btn-link btn-block" type="submit">Esquceu a Senha?</button>
    <hr />
    <button class="btn btn-lg btn-secondary btn-block" type="submit">Cadastrar</button>
  </form>
</template>

<script>
import { loginUser } from "../../../helpers/auth";

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
      this.isProcessing = true;
      this.error = {};
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        loader: "dots",
        color: "#52D18D"
      });
      loginUser(this.$data.form)
        .then(res => {
          loader.hide();
          this.$store.commit("loginUserSuccess", res);
          this.$router.push({ path: "/" });
          this.$notice["success"]({
            title: `Login`,
            description: `Seja bem-vindo  ${res.user.first_name}.`
          });
        })
        .catch(error => {
          this.$notice["error"]({
            title: `Login`,
            description: `${"Falha na operação"}.`
          });
          loader.hide();
          this.$store.commit("loginFailed", { error });
        });
    }
  }
};
</script>