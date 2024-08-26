<template>
    <ms-base-layout page-title="Cars Selling">
        <h1>Cars Selling Page</h1>
        <p>Info about cars</p>
    </ms-base-layout>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";

export default defineComponent({
    name: "CarsSelling",
    components: { MsBaseLayout },
});
</script>

<style scoped></style>
