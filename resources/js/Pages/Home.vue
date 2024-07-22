<template>
  <div>
    <h1>Users List</h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.name }} - {{ user.email }}
      </li>
    </ul>
  </div>
</template>

<script setup>
defineProps({
  users: Array
});
</script>
