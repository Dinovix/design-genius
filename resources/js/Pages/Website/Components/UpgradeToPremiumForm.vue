<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';

const premiumInput = ref(null);
const currentPremiumInput = ref(null);

const props = defineProps({
	user: Object
});

// alert(props.user.is_premium)

const form = useForm({
	_method: 'PUT',
	id: props.user.id,
    premium: props.user.is_premium == 1,
});

const updatePremium = () => {
    form.post(route('api.user-premium.update'), {

        errorBag: 'updatePremium',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.premium) {
                form.reset('premium');
            }

        },
    });
};
</script>

<template>
    <JetFormSection @submitted="updatePremium">
        <template #title>
            Update To Premium Account
        </template>

        <template #description>
           Becoming a premium user makes you eligible to receive insights on upcoming products before the general public, so you can make wise decision on time.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="premium" value="Activate Premium Account" />
                <JetCheckbox v-model:checked="form.premium" name="premium" id="premium" />
            </div>


        </template>

        <template #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                SAVE
            </JetButton>
        </template>
    </JetFormSection>
</template>
