<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Contacts Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Contacts Management
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
									href="/admin/contacts"
									>Contacts</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.name }}
							</h1>
						</div>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                    
									<text-input
										v-model="form.name"
										:error="form.errors.name"
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
										v-model="form.contact"
										:error="form.errors.contact"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="Contact"
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
									<button
										v-if="!contact.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete contact
									</button>
									<!-- <loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Contact</loading-button
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
		contact: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				name: this.contact.name,
				contact: this.contact.contact,
				email: this.contact.email,
				description: this.contact.description,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/contacts/${this.contact.id}`, {
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this client contact ?")) {
				this.$inertia.delete(`/admin/contacts/${this.contact.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this contact ?")) {
				this.$inertia.put(`/admin/contacts/${this.contact.id}/restore`);
			}
		},
	},
};
</script>