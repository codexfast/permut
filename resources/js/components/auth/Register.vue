<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Register</v-toolbar-title>
                <v-spacer />

              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    label="E-mail"
                    name="login"
                    type="email"
                    required
                  />

                  <v-text-field
                    id="password"
                    label="Senha"
                    name="password"
                    type="password"
                    autocomplete
                    required
                    />

                    <v-text-field
                    id="repassword"
                    label="Confirme senha"
                    name="repassword"
                    type="password"
                    autocomplete
                    required
                    />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                
                <div class="d-flex flex-column" style="width: 100%;">

                    <v-btn color="primary" :block="true">Registrar</v-btn>

                    <v-btn color="primary" :text="true" to="/">Login</v-btn>

                </div>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
  }
</script>