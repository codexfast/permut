<template>
    <div class="container-fluid">
      <div class="row">
        <ul class="nav nav-pills mb-3 col-sm-12 justify-content-center bg-dark" id="pills-tab" role="tablist">
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Geral">
            <a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true">
              <i class="fa fa-compass fa-2x"></i>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Menssagens">
            <a class="nav-link position-relative" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false">
              <i class="fa fa-paper-plane fa-2x"></i>
              <span class="badge badge-pill badge-light" style="position: absolute; right:0; top:0;">+9</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Pesquisar Permuta">
            <a class="nav-link" id="pills-search" data-toggle="pill" href="#pills-search" role="tab" aria-controls="pills-search" aria-selected="false" >
              <i class="fa fa-search fa-2x"></i>

            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Configurações">
            <a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">
              <i class="fa fa-gear fa-2x"></i>
            </a>
          </li>
        </ul>
        <div class="tab-content col-sm-12" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
            <!-- Compass Content -->
              <div class="container">
                <Banner src="https://dummyimage.com/1000x120/333/999" class="mb-2"/>

                <div class="row mb-4" v-if="currentUser.licensed!=1">
                  <div class="col">
                      <License />
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <CommonCard title="Interesse" bottom="Santa Branca" middle="Advogado" top="São Paulo" faIcon="fa fa-4x fa-plane"/>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <CommonCard title="Local" bottom="Novo Cruzeiro" middle="Advogado" top="Minas Gerais" faIcon="fa fa-4x fa-plane"/>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <CommonCard title="Saldo de Pesquisas" bottom="Clique aqui para comprar" middle="Pesquisas Restantes" top="13" fa-icon="fa fa-4x fa-search" to="/buy-surveys"/>
                  </div>
                </div>

              </div>
            <!-- End Compass Content -->
          </div>
    
          <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">...</div>
          <div class="tab-pane fade" id="pills-search" role="tabpanel" aria-labelledby="pills-search">...</div>
          <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">...</div>
          
          </div>
        </div>

      </div>
    </div>
</template>

<script>

import License from "./sub-components/License.vue";
import CommonCard from "./sub-components/CommonCard.vue";
import Banner from "./sub-components/Banner.vue";

export default {
  components: { 
    License, 
    CommonCard,
    Banner,
  },
  
  computed: {
    currentUser() {
      console.log(this.$store)
      return this.$store.getters.currentUser;
    },
  }
};
</script>