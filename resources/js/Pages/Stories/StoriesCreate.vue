<script lang="ts">
import { defineComponent, PropType } from "vue";
import { Author } from "@/types/Models";
import { Head, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import MsBaseLayout from "@/Layouts/MsBaseLayout.vue";
import { PlusCircleOutlined } from "@ant-design/icons-vue";
import { notification } from "ant-design-vue";

export default defineComponent({
    name: "StoriesCreate",
    components: { MsBaseLayout, Head, PlusCircleOutlined },
    props: {
        authors: {
            type: Array as PropType<Author[]>,
            required: true,
        },
    },
    data() {
        return {
            newStoryForm: {
                title: "",
                content: "",
                author_id: null,
                image_path: "",
            },
            saving: false,
        };
    },
    methods: {
        submitCreate() {
            router.post(route("stories.store"), this.newStoryForm, {
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
                        message: "Success !",
                        description: "Story has been created successfully",
                    });
                },
                onFinish: () => {
                    console.log("Finish request");
                    this.saving = false;
                },
            });
        },
        getAuthorsFullName(author: Author): string {
            return `${ author.name } ${ author.lastname }`;
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
    <ms-base-layout page-title="Create Story">
        <a-row :gutter="[24,24]">
            <a-col
                :lg="12"
                :xs="24"
            >
                <a-form
                    :disabled="saving"
                    layout="vertical"
                >
                    <a-form-item label="Title">
                        <a-input
                            v-model:value="newStoryForm.title"
                            placeholder="Title"
                        />
                    </a-form-item>

                    <a-form-item label="Content">
                        <a-textarea
                            v-model:value="newStoryForm.content"
                            placeholder="Content"
                        />
                    </a-form-item>

                    <a-form-item label="Author">
                        <a-select
                            v-model:value="newStoryForm.author_id"
                            :options="authorsOptions"
                            placeholder="Select author"
                        />
                    </a-form-item>

                    <a-form-item label="Image Path">
                        <a-input
                            v-model:value="newStoryForm.image_path"
                            placeholder="Image Path"
                        />
                    </a-form-item>

                    <a-form-item>
                        <a-button
                            :loading="saving"
                            type="primary"
                            @click="submitCreate"
                        >
                            <template #icon>
                                <PlusCircleOutlined />
                            </template>
                            Save
                        </a-button>
                    </a-form-item>
                </a-form>
            </a-col>

        </a-row>
    </ms-base-layout>

</template>

<style></style>