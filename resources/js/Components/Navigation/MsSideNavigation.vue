<script lang="ts">
import { defineComponent, h } from "vue";
import { ItemType } from "ant-design-vue/es/menu/src/hooks/useItems";
import { route, RouteList } from "ziggy-js";
import { router } from "@inertiajs/vue3";
import { 
    PlusCircleOutlined, 
    UnorderedListOutlined, 
    HomeOutlined, 
    CarOutlined, 
    InfoCircleOutlined, 
    PictureOutlined, 
    PhoneOutlined 
} from "@ant-design/icons-vue";

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
        UnorderedListOutlined,
        HomeOutlined,
        CarOutlined,
        InfoCircleOutlined,
        PictureOutlined,
        PhoneOutlined
    },
    data() {
        return {};
    },
    methods: {
        handleMenuItemClick(itemClickEvent: any) {
            const routeName = itemClickEvent.item.route;
            router.get(route(routeName));
        },
    },
    computed: {
        menuItems() {
            return [
                {
                    key: "home.index",
                    route: "home.index",
                    label: "Home",
                    icon: () => h(HomeOutlined),
                },
                {
                    key: "cars-selling.index",
                    route: "cars-selling.index",
                    label: "Cars Selling",
                    icon: () => h(CarOutlined),
                },
                {
                    key: "assistance.index",
                    route: "assistance.index",
                    label: "Assistance",
                    icon: () => h(InfoCircleOutlined),
                },
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
                {
                    key: "gallery.index",
                    route: "gallery.index",
                    label: "Gallery",
                    icon: () => h(PictureOutlined),
                },
                {
                    key: "contact-us.index",
                    route: "contact-us.index",
                    label: "Contact Us",
                    icon: () => h(PhoneOutlined),
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
