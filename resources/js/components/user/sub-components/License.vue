<template>
    <div class="card">
        <div class="card-header">
            Ative sua plataforma
        </div>
        <div class="card-body">
            <h5 class="card-title">Por apenas R$ xx,xx</h5>
            <p class="card-text">Faça a ativação e farão parte dos primeiros clientes licenciados</p>
            <a href="#" class="btn btn-secondary" @click.prevent="premium">Ativar</a>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    methods: {
        premium() {
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        loader: "dots",
        color: "#238238"
      });
      axios
        .get(`/user/premium`)
        .then(response => {
          if (!response.data.success) {
            Swal.fire("Erro!", response.data.message, "error");
          } else if (response.data.url) {
            window.location.href = response.data.url;
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {
          loader.hide();
        });
    },
    }
}
</script>