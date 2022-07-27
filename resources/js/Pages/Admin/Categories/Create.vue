<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps(["categories"]);
</script>

<template>
	<AppLayout title="Products Categories Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Products Categories Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head title="Create Product Category" />
						<h1 class="mb-8 text-3xl font-bold">
							<Link
								class="text-indigo-400 hover:text-indigo-600"
								href="/admin/categories"
								>Products Categories</Link
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
										v-model="form.name"
										:error="form.errors.name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Name"
									/>
									<textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Description"
									/>
									
								</div>
								<div
									class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<loading-button
										:loading="form.processing"
										class="btn-indigo"
										type="submit"
										>Create Category</loading-button
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
import TextareaInput from "@/Shared/TextareaInput";
import TextInput from "@/Shared/TextInput";
import LoadingButton from "@/Shared/LoadingButton";

export default {
	components: {
		Head,
		Link,
		LoadingButton,
		TextareaInput,
		TextInput,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				description: "",
			}),
		};
	},
	methods: {
		store() {
			this.form.post("/admin/categories");
		},
	},
};
</script>
