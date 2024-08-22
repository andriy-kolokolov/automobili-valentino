<script lang="ts">
import { defineComponent, h } from "vue";
import { ItemType } from "ant-design-vue/es/menu/src/hooks/useItems";
import { route, RouteList } from "ziggy-js";
import { router } from "@inertiajs/vue3";
import { PlusCircleOutlined, UnorderedListOutlined } from "@ant-design/icons-vue";


type MenuItem = ItemType & {
    key: keyof RouteList;
    route: keyof RouteList;
    title: string;
    label: string;
    children?: MenuItem[];
    icon: () => ReturnType<typeof h>;
};

export default defineComponent({
    name: "MsSideNavigation",
    components: {
        PlusCircleOutlined,
    },
    data() {
        return {};
    },
    methods: {
        handleMenuItemClick(itemClickEvent: any) {
            const routeName = itemClickEvent.item.route;
            router.get(route(routeName))
        },
    },
    computed: {
        menuItems() {
            return [
                {
                    key: "stories.index",
                    route: "stories.index",
                    label: "Stories",
                    icon: () => h(UnorderedListOutlined),
                },
                {
                    key: "stories.create",
                    route: "stories.create",
                    label: "Create Story",
                    icon: () => h(PlusCircleOutlined),
                },
            ] as MenuItem[];
        },
        selectedKeys() {
            return [route().current()] as string[];
        },
    },
});
</script>

<template>
    <a-menu
        :items="menuItems"
        :selected-keys="selectedKeys"
        :style="{ height: '100%' }"
        theme="light"
        @click="handleMenuItemClick"
    ></a-menu>
</template>

<style scoped>

</style>