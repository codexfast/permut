<template>
    <div class="container-fluid">
      <div class="row">
        <ul class="nav nav-pills mb-3 col-sm-12 justify-content-center bg-dark" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true">
              <i class="fa fa-compass fa-2x"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false">
              <i class="fa fa-paper-plane fa-2x"></i>
              <span class="badge badge-pill badge-light" style="position: absolute; right:0; top:0;">+9</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">
              <i class="fa fa-gear fa-2x"></i>

            </a>
          </li>
        </ul>
        <div class="tab-content col-sm-12" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
            <!-- Compass Content -->
              <div class="container">
                <div class="row mb-4">
                  <div class="col">
                      <License />
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <InterestCard title="Interesse" city="Santa Branca" position="Advogado" state="São Paulo"/>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <InterestCard title="Atual" city="Novo Cruzeiro" position="Advogado" state="Minas Gerais"/>
                  </div>
      
                </div>

              </div>
          </div>
          
            <!-- End Compass Content -->
          </div>
          <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">...</div>
          <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">...</div>
        </div>

      </div>
    </div>
</template>

<script>

import License from "./sub-components/License.vue";
import InterestCard from "./sub-components/InterestCard.vue";

export default {
  components: { License , InterestCard },
  
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  }
};
</script>