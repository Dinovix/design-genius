<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Product Category Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Product Category Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.name}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/categories"
									>Products Categories</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.name }}
							</h1>
						</div>
						<!-- <trashed-message
							v-if="category.deleted_at"
							class="mb-6"
							@restore="restore"
						>
							This category has been deleted.
						</trashed-message> -->
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
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
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!category.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete Category
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Category</loading-button
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
// import TrashedMessage from "@/Shared/TrashedMessage";

export default {
	components: {
		Head,
		Link,
		LoadingButton,
		TextInput,
        TextareaInput
	},
	props: {
		category: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				name: this.category.name,
				description: this.category.description,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/categories/${this.category.id}`, {
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this category ?")) {
				this.$inertia.delete(`/admin/categories/${this.category.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this category ?")) {
				this.$inertia.put(`/admin/categories/${this.category.id}/restore`);
			}
		},
	},
};
</script>
