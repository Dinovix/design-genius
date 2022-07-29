<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Logs Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Logs Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.full_name}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/logs"
									>Logs</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.full_name }}
							</h1>
						</div>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                    
									<text-input
										v-model="form.full_name"
										:error="form.errors.full_name"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="Name"
									/>
									<text-input
										v-model="form.email"
										:error="form.errors.email"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="Email"
									/>
									<text-input
										v-model="form.title"
										:error="form.errors.title"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="Operation Title"
									/>
									<textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="description"
									/>
                                </div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<!-- <button
										v-if="!log.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete Log
									</button> -->
									<!-- <loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Log</loading-button
									> -->
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
		log: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				full_name: this.log.full_name,
				title: this.log.title,
				email: this.log.email,
				description: this.log.description,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/logs/${this.contact.id}`, {
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this log ?")) {
				this.$inertia.delete(`/admin/logs/${this.log.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this log ?")) {
				this.$inertia.put(`/admin/logs/${this.log.id}/restore`);
			}
		},
	},
};
</script>