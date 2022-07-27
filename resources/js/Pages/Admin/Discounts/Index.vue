<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["discounts"]);
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
                <div class="flex items-right mb-6">
					<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/discounts/create`"> Create Discounts </a>
                </div>
						<Table
							:resource="discounts"
							name="discounts"
							preserve-scroll="table-top"
						>
							<template #cell(actions)="{ item: discount }">
								<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/discounts/${discount.id}/edit`"> Edit </a>
							</template>
						</Table>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
