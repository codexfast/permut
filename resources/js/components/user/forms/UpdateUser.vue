<template>
  <form @submit.prevent="update">
    <div class="form-group">
      <label for="email">Nome</label>
      <input type="text" class="form-control" id="name" v-model="user.name" required />
    </div>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input
        type="email"
        class="form-control"
        id="email"
        aria-describedby="emailHelp"
        v-model="user.email"
        disabled
        required

      />
      <small id="emailHelp" class="form-text text-muted">Endereço de e-mail não pode ser alterado</small>
    </div>

    <div class="form-group">
      <label for="phone">Whatsapp</label>
      <input
        type="tel"
        class="form-control"
        id="phone"
        aria-describedby="emailHelp"
        v-model="user.whatsapp"
        pattern="[0-9]+"

        required
      />
    </div>

    <div class="form-group">
      <!-- Only MG -->
      <label for="citySelect">Cidade</label>
      <select class="form-control" id="citySelect" v-model="user.city_id">
        <option value selected>Selecione a sua cidade</option>
        <option v-for="(city, idx) in cities" :key="idx" v-bind:value="city.id">{{city.city}}</option>
      </select>

      <small id="citySelect" class="form-text text-muted">Apenas regiões de Minas Gerais</small>
    </div>

    <div class="form-group">
      <!-- Only City on MG -->
      <label for="citySelect">Instituição</label>
      <select class="form-control" id="institutionSelect" v-model="user.institution_id" v-on:change="this.getPositions">
        <option value selected>Selecione a sua instituição</option>
        <option v-for="(institution, idx) in institutions" :key="idx" v-bind:value="institution.id">{{institution.name}}</option>
      </select>

      <small id="institutionSelect" class="form-text text-muted">Apenas regiões de Minas Gerais</small>
    </div>

    <div class="form-group">
      <!-- Only City on MG -->
      <label for="citySelect">Cargo</label>
      <select class="form-control" id="positionSelect" v-model="user.position_id">
        <option value selected>Selecione a sua instituição</option>
        <option v-for="(position, idx) in positions" :key="idx" v-bind:value="position.id">{{position.position}}</option>
      </select>

      <small id="institutionSelect" class="form-text text-muted">Apenas regiões de Minas Gerais</small>
    </div>

    <div class="form-group">
      <label for="avatar">Avatar</label>

      <div class="custom-file">
        <input
          type="file"
          class="custom-file-input"
          id="avatar"
          accept="image/x-png, image/gif, image/jpeg"
          @change="handleFileUpload"
        />
        <label class="custom-file-label" for="avatar">Escolha sua foto de perfil</label>
      </div>
      <small id="avatar" class="form-text text-muted">Recomendado imagen 1:1 com máxima 128px</small>
    </div>

    <button type="submit" class="btn btn-secondary">Atualizar</button>
  </form>
</template>

<script>
import bsCustomFileInput from "bs-custom-file-input";
import Swal from "sweetalert2";

export default {
  name: "UpdateUser",

  mounted() {
    this.$store.dispatch("fetchUser");
    bsCustomFileInput.init();
    
    this.user = this.currentUser;

    this.getCitiesByState();
    this.getInstitutionByCity(this.user.city_id);
    this.getPositions();
  },
  data() {
    return {
      user: {},
      cities: [],
      institutions: [],
      positions: [],
    };
  },
  methods: {
    handleFileUpload(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (files) {
        this.createImage(files[0]);
      }
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      reader.onload = e => {
        this.user = Object.assign(this.user, {
          imageToUpload: e.target.result
        });
      };

      reader.readAsDataURL(file);
    },
    update() {
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.contacts,
        canCancel: false,
        loader: "dots",
        color: "#238238"
      });
      axios
        .put(`/user/update`, this.user)
        .then(response => {
          if (response.data.success) {
            Swal.fire("Sucesso!", response.data.message, "success");
          } else {
            Swal.fire("Erro!", "Falha ao realizar a operação", "error");
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {
          loader.hide();
          this.$store.dispatch("fetchUser");
        });
    },
    async getCitiesByState(id = 1) {
      axios
        .get(`/state/${id}`)
        .then(response => {
          if (response.data.success) {
            this.cities = response.data.cities;
          } else {
            Swal.fire("Erro!", "Falha ao realizar a operação", "error");
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {});
    },
    async getInstitutionByCity(id) {
      axios
        .get(`/institution/${id}`)
        .then(response => {
          if (response.data.success) {
            this.institutions = response.data.institutions;
          } else {
            Swal.fire("Erro!", "Falha ao realizar a operação", "error");
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {});
    },
    async getPositions(id) {
      axios
        .get(`/positions/`)
        .then(response => {
          if (response.data.success) {
            this.positions = response.data.positions;
          } else {
            Swal.fire("Erro!", "Falha ao realizar a operação", "error");
          }
        })
        .catch(err => {
          Swal.fire("Erro!", "Falha ao realizar a operação", "error");
        })
        .finally(() => {});
    }
  },
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }
};
</script>