<script lang="ts">
import { defineComponent, PropType } from "vue";
import { Author, Story } from "@/types/Models";
import { Head, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";
import { SaveOutlined } from "@ant-design/icons-vue";
import { notification } from "ant-design-vue";

export default defineComponent({
    name: "StoriesEdit",
    components: { MsBaseLayout, Head, SaveOutlined },
    props: {
        authors: {
            type: Array as PropType<Author[]>,
            required: true,
        },
        story: {
            type: Object as PropType<Story>,
            required: true,
        },
    },
    data() {
        return {
            editStoryForm: {
                title: this.story.title,
                content: this.story.content,
                author_id: this.story.author_id,
                image_path: this.story.image_path,
            },
            saving: false,
        };
    },
    methods: {
        submitUpdate() {
            router.put(route('stories.update', this.story.id), this.editStoryForm, {
                preserveState: true,
                preserveScroll: true,
                onBefore: () => {
                    console.log("Before sending request");
                    this.saving = true;
                },
                onError: (errors) => {
                    console.log("Validation Fails");
                    console.warn(errors);
                },
                onSuccess: () => {
                    notification.success({
                        message: "Success!",
                        description: "Story has been updated successfully",
                    });
                },
                onFinish: () => {
                    console.log("Finish request");
                    this.saving = false;
                },
            });
        },
        getAuthorsFullName(author: Author): string {
            return `${author.name} ${author.lastname}`;
        },
    },
    computed: {
        authorsOptions() {
            return this.authors.map((author: Author) => ({
                value: author.id,
                label: this.getAuthorsFullName(author),
            }));
        },
    },
});
</script>

<template>
    <ms-base-layout page-title="Edit Story">
        <a-row :gutter="[24, 24]">
            <a-col :lg="12" :xs="24">
                <a-form :disabled="saving" layout="vertical">
                    <a-form-item label="Title">
                        <a-input v-model:value="editStoryForm.title" placeholder="Title" />
                    </a-form-item>

                    <a-form-item label="Content">
                        <a-textarea v-model:value="editStoryForm.content" placeholder="Content" />
                    </a-form-item>

                    <a-form-item label="Author">
                        <a-select v-model:value="editStoryForm.author_id" :options="authorsOptions" placeholder="Select author" />
                    </a-form-item>

                    <a-form-item label="Image Path">
                        <a-input v-model:value="editStoryForm.image_path" placeholder="Image Path" />
                    </a-form-item>

                    <a-form-item>
                        <a-button :loading="saving" type="primary" @click="submitUpdate">
                            <template #icon>
                                <SaveOutlined />
                            </template>
                            Save
                        </a-button>
                    </a-form-item>
                </a-form>
            </a-col>
        </a-row>
    </ms-base-layout>
</template>

<style scoped></style>
