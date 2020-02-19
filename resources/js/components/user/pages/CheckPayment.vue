<template>
  <div class="container-fluid height-full">
    <div
      class="row justify-content-center align-items-center h-100"
      style="
    background: #fff;
"
    >
      <div style="width: 32em;" class="text-white container justify-content-center">
        <div class="alert alert-success" role="alert">Processando...</div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  components: {},
  mounted() {
    this.check();
  },

  data() {
    return {};
  },
  methods: {
    check() {
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        loader: "dots",
        color: "#238238"
      });
      axios
        .get("/mercadopago/callback/" + window.location.search.replace("?", ""))
        .then(response => {
          if (response.data.success) {
            Swal.fire("Sucesso!", response.data.message, "success");
            this.$router.push({ path: "/profile" });
          } else {
            Swal.fire("Erro!", response.data.message, "error");
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {
          loader.hide();
        });
    }
  },
  computed: {}
};
</script>

<style scoped>
</style>

