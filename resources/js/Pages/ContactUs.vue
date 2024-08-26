<template>
    <ms-base-layout page-title="Contact Us">
        <h1>Contact Us Page</h1>
        <p>Our contacts</p>
    </ms-base-layout>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";

export default defineComponent({
    name: "ContactUs",
    components: { MsBaseLayout },
});
</script>

<style scoped></style>
