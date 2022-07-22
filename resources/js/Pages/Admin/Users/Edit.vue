<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Users Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Users Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.first_name} ${form.last_name}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/users"
									>Users</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.first_name }} {{ form.last_name }}
							</h1>
							<img
								v-if="user.photo"
								class="block ml-4 w-8 h-8 rounded-full"
								:src="user.photo"
							/>
						</div>
						<trashed-message
							v-if="user.deleted_at"
							class="mb-6"
							@restore="restore"
						>
							This user has been deleted.
						</trashed-message>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
									<text-input
										v-model="form.first_name"
										:error="form.errors.first_name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="First name"
									/>
									<text-input
										v-model="form.last_name"
										:error="form.errors.last_name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Last name"
									/>
									<text-input
										v-model="form.email"
										:error="form.errors.email"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Email"
									/>
									<text-input
										v-model="form.password"
										:error="form.errors.password"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="password"
										autocomplete="new-password"
										label="Password"
									/>
									<select-input
										v-model="form.gender"
										:error="form.errors.gender"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Gender"
									>
                                        <option :value="null" />
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select-input>
									<text-input
										v-model="form.country"
										:error="form.errors.country"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="country"
									/>
									<text-input
										v-model="form.town"
										:error="form.errors.town"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="town"
									/>
									<text-input
										v-model="form.phone"
										:error="form.errors.phone"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Phone"
									/>
									<select-input
										v-model="form.is_admin"
										:error="form.errors.is_admin"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Admin"
									>
										<option :value="0">No</option>
										<option :value="1">Yes</option>
									</select-input>
									<file-input
										v-model="form.photo"
										:error="form.errors.photo"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="file"
										accept="image/*"
										label="Photo"
									/>
								</div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!user.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete User
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update User</loading-button
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
		TrashedMessage,
	},
	props: {
		user: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				first_name: this.user.first_name,
				last_name: this.user.last_name,
				email: this.user.email,
				gender: this.user.gender,
				country: this.user.country,
				town: this.user.town,
				phone: this.user.phone,
				password: "",
				is_admin: this.user.is_admin,
				photo: null,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/users/${this.user.id}`, {
				onSuccess: () => this.form.reset("password", "photo"),
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this user?")) {
				this.$inertia.delete(`/admin/users/${this.user.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this user?")) {
				this.$inertia.put(`/users/${this.user.id}/restore`);
			}
		},
	},
};
</script>
