<script lang="ts">
import { defineComponent, PropType } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import { Author, Story } from "@/types/Models";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";
import { DeleteOutlined, EditOutlined } from "@ant-design/icons-vue";

export default defineComponent({
    name: "StoriesIndex",
    components: { MsBaseLayout, Head, Link, DeleteOutlined, EditOutlined },
    props: {
        authors: {
            type: Array as PropType<Author[]>,
            required: true,
        },
        stories: {
            type: Array as PropType<Story[]>,
            required: true,
        },
    },
    data() {
        return {};
    },
    methods: {
        getAuthorById(authorId: number): Author | undefined {
            return this.authors.find((author) => author.id === authorId); //returns undefined if not found
        },
        getAuthorsFullName(author: Author | undefined): string {
            if (author === undefined) return "";

            return `${ author.name } ${ author.lastname }`;
        },
    },
});
</script>

<template>
    <ms-base-layout page-title="Stories">
        <a-row :gutter="[12 ,12]">
            <a-col
                v-for="story in stories"
                :lg="12"
                :xxl="8"
            >
                <a-card
                    :key="story.id"
                >
                    <template #title>
                        <a-row>
                            <a-col :span="24">
                                <a-typography-title :level="4">{{ story.title }}</a-typography-title>
                            </a-col>
                        </a-row>
                    </template>

                    <template #default>
                        <a-row :gutter="[6, 6]">
                            <a-col :span="24">
                                <a-typography>Content: {{ story.content }}</a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Author: {{ getAuthorsFullName(getAuthorById(story.author_id)) }}
                                </a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Image Path : {{ story.image_path }}</a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Views: {{ story.views_count }}</a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Hidden: {{ story.is_hidden === 1 ? "Yes" : "No" }}</a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Created at: {{ story.created_at }}</a-typography>
                            </a-col>

                            <a-col :span="24">
                                <a-typography>Updated at: {{ story.updated_at }}</a-typography>
                            </a-col>
                        </a-row>
                    </template>

                    <template #extra>
                        <a-row>
                            <a-col :span="24">
                                <a-button
                                    :href="`/stories/${story.id}`"
                                    type="primary"
                                >
                                    Read more
                                </a-button>
                            </a-col>
                        </a-row>
                    </template>

                    <template #actions>
                        <EditOutlined />
                        <DeleteOutlined :style="{color: 'red'}" />
                    </template>
                </a-card>
            </a-col>
        </a-row>
    </ms-base-layout>
</template>

<style scoped></style>
