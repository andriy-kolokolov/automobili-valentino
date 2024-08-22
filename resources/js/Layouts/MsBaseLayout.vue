<script lang="ts">
import { defineComponent } from "vue";
import MsSideNavigation from "@/Components/Navigation/MsSideNavigation.vue";
import { Head } from "@inertiajs/vue3";

export default defineComponent({
    name: "MsBaseLayout",
    components: { MsSideNavigation, Head },
    props: {
        pageTitle: {
            type: String,
            required: true,
        },
    },
});
</script>

<template>
    <Head :title="pageTitle" />

    <a-layout
        :style="{
        minHeight: '100vh',
    }"
    >
        <a-layout-sider>
            <ms-side-navigation />
        </a-layout-sider>

        <a-layout>
            <a-layout-header
                :style="{
                backgroundColor: '#fff',
                padding: '0 24px',
                boxShadow: '0 2px 8px rgba(0, 0, 0, 0.09)',
            }"
            >
                <a-flex
                    align="center"
                    :style="{height: '100%'}"
                >
                    <a-typography-title :level="3">{{ pageTitle }}</a-typography-title>
                </a-flex>
            </a-layout-header>

            <a-layout-content
                :style="{
                    padding: '14px',
                }"
            >
                <slot></slot>
            </a-layout-content>

            <a-layout-footer
                :style="{
                    backgroundColor: '#fff',
                    padding: '5px',
                    boxShadow: '0 -2px 8px rgba(0, 0, 0, 0.09)',
                }"
            >
                <a-flex justify="end">
                    <a-typography-text
                        type="secondary"
                        style="text-align: center"
                    >
                        © 2024 Suspensia inc. All rights reserved.
                    </a-typography-text>
                </a-flex>
            </a-layout-footer>
        </a-layout>
    </a-layout>
</template>

<style>

</style>