export default interface Track {
    id: number;
    user_id: number;
    title: string;
    artist: string;
    description?: string;
    cover: string;
    url: string;
    created_at?: string;
    updated_at?: string;
}
