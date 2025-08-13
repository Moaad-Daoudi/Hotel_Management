import { defineStore } from 'pinia';
// import ReceptionApiService from '@/services/Admin/ReceptionApiService';

export const useAdminReceptionStore = defineStore('adminReception', {
    state: () => ({
        bookings: [],
        pagination: {},
        currentBooking: null,
        isLoading: false,
    }),
    actions: {
        // async loadBookings(filters) {
            // Logic:
            // 1. Set isLoading = true.
            // 2. Call `ReceptionApiService.fetchBookings(filters)`.
            // 3. Commit response to `this.bookings` and `this.pagination`.
            // 4. Set isLoading = false.
        // },
        // async loadBookingDetails(bookingId) {
            // Logic:
            // 1. Set isLoading = true.
            // 2. Call `ReceptionApiService.fetchBookingDetails(bookingId)`.
            // 3. Commit response to `this.currentBooking`.
            // 4. Set isLoading = false.
        // },
        // async checkInGuest(bookingId, roomId = null) {
            // Logic:
            // 1. Call `ReceptionApiService.performCheckIn(bookingId, roomId)`.
            // 2. On success, it's a good idea to reload the booking details or the main bookings list
            //    to reflect the status change, e.g., `this.loadBookingDetails(bookingId)`.
        // }
    }
});
