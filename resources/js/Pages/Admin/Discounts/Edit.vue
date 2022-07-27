<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Discounts Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Discounts Management
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
									href="/admin/discounts"
									>Discounts</Link
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
										label="Name"
									/>
									<textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Description"
									/>
                                    <text-input
										v-model="form.percentage"
										:error="form.errors.percentage"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Percentage"
                                        type="number"
									/>
                                    <text-input
										v-model="form.exp_date"
										:error="form.errors.exp_date"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Expiration Date"
                                        type="date"
									/>
                                    <select-input
										v-model="form.active"
										:error="form.errors.active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Active"
									>
                                        <option :value="null" />
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select-input>

									<select-input
										v-model="form.is_for_rent"
										:error="form.errors.is_for_rent"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Enabled For Rent"
									>
                                        <option :value="null" />
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select-input>
									
								</div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!discount.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete Discount
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Discount</loading-button
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
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import LoadingButton from "@/Shared/LoadingButton";
// import TrashedMessage from "@/Shared/TrashedMessage";

export default {
	components: {
		Head,
		Link,
		LoadingButton,
		TextInput,
        TextareaInput,
        SelectInput
	},
	props: {
		discount: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				name: this.discount.name,
				description: this.discount.description,
				percentage: this.discount.percentage,
				is_for_rent: this.discount.is_for_rent,
				active: this.discount.active,
				exp_date: this.discount.exp_date
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/discounts/${this.discount.id}`, {
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this discount ?")) {
				this.$inertia.delete(`/admin/discounts/${this.discount.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this discount ?")) {
				this.$inertia.put(`/admin/discounts/${this.discount.id}/restore`);
			}
		},
	},
};
</script>