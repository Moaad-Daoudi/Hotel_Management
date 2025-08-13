import api from './api';

class GuestApiService {
    fetchMyBookings() {
        // Logic:
        // 1. GET from '/api/guest/my-bookings'.
        return api.get('/guest/my-bookings');
    }

    updateMyProfile(profileData) {
        // Logic:
        // 1. PUT to '/api/guest/my-profile' with the `profileData`.
        return api.put('/api/guest/my-profile', profileData);
    }

    makePayment(paymentData) {
        // Logic:
        // 1. POST to '/api/guest/my-payments' with `paymentData` { booking_id, payment_token }.
        return api.post('/api/guest/my-payments', paymentData);
    }
}

export default new GuestApiService();
