<template>
    <ms-base-layout page-title="Assistance">
        <h1>Assistance Page</h1>
        <p>Info about assistance services</p>
    </ms-base-layout>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";

export default defineComponent({
    name: "Assistance",
    components: { MsBaseLayout },
});
</script>

<style scoped></style>
