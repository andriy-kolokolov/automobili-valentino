<template>
    <ms-base-layout page-title="Contact Us">
        <h1>Contact Us Page</h1>
        <p>Our contacts</p>

        <a-row gutter="16">
            <a-col :xs="24" :sm="12" :md="8">
                <a-card bordered>
                    <template #title>
                        <SoundOutlined /> Telefono
                    </template>
                    <p>+390273957076</p>
                    <p>+393406762828</p>
                    <p>+393465588700</p>
                </a-card>
            </a-col>
            <a-col :xs="24" :sm="12" :md="8">
                <a-card bordered>
                    <template #title>
                        <MailOutlined /> E-mail
                    </template>
                    <p>automobilivalentino@gmail.com</p>
                </a-card>
            </a-col>
            <a-col :xs="24" :sm="12" :md="8">
                <a-card bordered>
                    <template #title>
                        <EnvironmentOutlined /> Indirizzo
                    </template>
                    <p>Via Luisa Battistotti Sassi 6 – 20133 – Milano (MI)</p>
                </a-card>
            </a-col>
        </a-row>
    </ms-base-layout>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";
import { Card, Row, Col } from "ant-design-vue";
import { SoundOutlined, MailOutlined, EnvironmentOutlined } from "@ant-design/icons-vue";

export default defineComponent({
    name: "ContactUs",
    components: {
        MsBaseLayout,
        ACard: Card,
        ARow: Row,
        ACol: Col,
        SoundOutlined,
        MailOutlined,
        EnvironmentOutlined
    },
});
</script>

<style scoped></style>
