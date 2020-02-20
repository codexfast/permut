<template>
    <form>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" :value="currentUser.email" disabled name="email">
            <small id="emailHelp" class="form-text text-muted">Endereço de e-mail não pode ser alterado</small>
        </div>

        <div class="form-group">
            <label for="phone">Whatsapp</label>
            <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" :value="currentUser.whatsapp" pattern="[0-9]+" name="phone">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" :value="currentUser.email" disabled name="email">
            <small id="emailHelp" class="form-text text-muted">Endereço de e-mail não pode ser alterado</small>
        </div>

        <button type="submit" class="btn btn-secondary">Atualizar</button>
    </form>
</template>

<script>
export default {
    name: 'UpdateUser',
    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        },
    }
}
</script>