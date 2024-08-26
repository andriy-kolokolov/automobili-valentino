<template>
  <ms-base-layout page-title="Home">
    <div>
      <h1>Users List</h1>
      <ul>
        <li v-for="user in users" :key="user.id">
          {{ user.name }} - {{ user.email }}
        </li>
      </ul>
    </div>
  </ms-base-layout>
</template>

<script setup lang="ts">
defineProps({
  users: {
    type: Array as PropType<{ id: number; name: string; email: string }[]>,
    required: true,
  }
});
</script>

<script lang="ts">
import { defineComponent } from "vue";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";

export default defineComponent({
  name: "Home",
  components: { MsBaseLayout },
});
</script>

<style scoped></style>
