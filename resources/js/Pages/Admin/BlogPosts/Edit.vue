<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Blog Post Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Blog Post Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.title}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/blogposts"
									>Blog Post</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.title }}
							</h1>
							<img
								v-if="blogpost.banner"
								class="block ml-4 w-8 h-8 rounded-full"
								:src="blogpost.banner"
							/>
						</div>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                    
									<text-input
										v-model="form.title"
										:error="form.errors.title"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Title"
									/>
									<text-input
										v-model="form.author"
										:error="form.errors.author"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Author"
									/>
									<textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Description"
									/>
									<textarea-input
										v-model="form.content"
										:error="form.errors.content"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Content"
									/>
                                    <text-input
										v-model="form.tags"
										:error="form.errors.tags"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Tags"
									/>
                                    <select-input
										v-model="form.is_active"
										:error="form.errors.is_active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Visible"
									>
										<option :value="null" />
										<option value="0">NO</option>
										<option value="1">YES</option>
									</select-input>

                                    <file-input
										v-model="form.banner"
										:error="form.errors.banner"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="file"
										accept="image/*"
										label="Blog Post Banner Image"
									/>
								
                                </div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!blogpost.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete Blog Post
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Blog Post</loading-button
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
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import SelectInput from "@/Shared/SelectInput";
import LoadingButton from "@/Shared/LoadingButton";
import TrashedMessage from "@/Shared/TrashedMessage";

export default {
	components: {
		FileInput,
		Head,
		Link,
		LoadingButton,
		SelectInput,
		TextInput,
		TextareaInput,
		TrashedMessage,
	},
	props: {
		blogpost: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				title: this.blogpost.title,
				author: this.blogpost.author,
				description: this.blogpost.description,
				content: this.blogpost.content,
				tags: this.blogpost.tags,
				is_active: this.blogpost.is_active,
				banner: null,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/blogposts/${this.blogpost.id}`, {
				onSuccess: () => this.form.reset("banner"),
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this blog post ?")) {
				this.$inertia.delete(`/admin/blogposts/${this.blogpost.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this blog post?")) {
				this.$inertia.put(`/admin/blogposts/${this.blogpost.id}/restore`);
			}
		},
	},
};
</script>