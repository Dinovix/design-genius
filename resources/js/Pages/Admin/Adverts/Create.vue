<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["adverts"]);
</script>

<template>
	<AppLayout title="Adverts Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Adverts Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head title="Create Adverts" />
						<h1 class="mb-8 text-3xl font-bold">
							<Link
								class="text-indigo-400 hover:text-indigo-600"
								href="/admin/adverts"
								>Adverts</Link
							>
							<span class="text-indigo-400 font-medium">/</span>
							Create
						</h1>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="store">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
									<text-input
										v-model="form.title"
										:error="form.errors.title"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Title"
									/>
									<text-input
										v-model="form.url"
										:error="form.errors.url"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="URL"
                                        type="url"
									/>
                                    <select-input
										v-model="form.active"
										:error="form.errors.active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Visible"
									>
										<option :value="null" />
										<option value="0">NO</option>
										<option value="1">YES</option>
									</select-input>
                                    <textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Description"
									/>
									<file-input
										v-model="form.image"
										:error="form.errors.image"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="file"
										accept="image/*"
										label="Advert Image"
									/>
								</div>
								<div
									class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<loading-button
										:loading="form.processing"
										class="btn-indigo"
										type="submit"
										>Create Advert</loading-button
									>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import FileInput from "@/Shared/FileInput";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import SelectInput from "@/Shared/SelectInput";
import LoadingButton from "@/Shared/LoadingButton";

export default {
	components: {
		FileInput,
		Head,
		Link,
		LoadingButton,
		SelectInput,
		TextInput,
        TextareaInput
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				title: "",
				description: null,
				url: null,
				active: null,
				image: null,
			}),
		};
	},
	methods: {
		store() {
			this.form.post("/admin/adverts");
		},
	},
};
</script>
