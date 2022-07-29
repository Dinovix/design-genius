<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
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
						<Head :title="`${form.title}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/adverts"
									>Adverts</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.title }}
							</h1>
							<img
								v-if="advert.image"
								class="block ml-4 w-8 h-8 rounded-full"
								:src="advert.image"
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
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!advert.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete advert
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Advert</loading-button
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
		advert: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				title: this.advert.title,
				description: this.advert.description,
				url: this.advert.url,
				active: this.advert.active,
				image: null,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/adverts/${this.advert.id}`, {
				onSuccess: () => this.form.reset("image"),
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this advert ?")) {
				this.$inertia.delete(`/admin/adverts/${this.advert.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this advert?")) {
				this.$inertia.put(`/admin/adverts/${this.advert.id}/restore`);
			}
		},
	},
};
</script>