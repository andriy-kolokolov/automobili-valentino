<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    name: "StoriesIndex",
    props: {
        authors: {
            type: Array,
            required: true,
        },
        stories: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {};
    },
});
</script>

<template>
<pre>
    {{ authors }}
</pre>

<pre>
    {{ stories }}
</pre>
</template>

<style scoped>

</style>