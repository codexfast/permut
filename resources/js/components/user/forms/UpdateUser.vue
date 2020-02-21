<template>
    <form>
        <div class="form-group">
            <label for="email">Nome</label>
            <input type="text" class="form-control" id="name"  :value="currentUser.name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" :value="currentUser.email" disabled required name="email">
            <small id="emailHelp" class="form-text text-muted">Endereço de e-mail não pode ser alterado</small>
        </div>

        <div class="form-group">
            <label for="phone">Whatsapp</label>
            <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" :value="currentUser.whatsapp" pattern="[0-9]+" name="phone" required>
        </div>

        <div class="form-group">
            <!-- Only MG -->
            <label for="citySelect">Cidade</label>
            <select class="form-control" id="citySelect">
                
                <!-- <option :v-for="city in cities">
                    {{city}}
                </option> -->
            </select>
            <small id="citySelect" class="form-text text-muted">Apenas regiões de Minas Gerais</small>

        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="avatar" accept="image/x-png,image/gif,image/jpeg">
                <label class="custom-file-label" for="avatar">Escolha sua foto de perfil</label>
            </div>
            <small id="avatar" class="form-text text-muted">Recomendado imagen 1:1 com máxima 128px</small>
        </div>

        <button type="submit" class="btn btn-secondary" @click.prevent >Atualizar</button>
    </form>
</template>

<script>

import bsCustomFileInput from 'bs-custom-file-input';


export default {
    name: 'UpdateUser',
    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        },
    },
    mounted () {
        bsCustomFileInput.init()

    },
    methods: {
        async getCitiesByState () {
            // This status will be standard, sales orders
            // MG Default
            return await axios.get("/state/1/cities").data;
                
        }
    }
}
</script>