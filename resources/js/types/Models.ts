export interface Author {
    id?: number;
    name: string;
    lastname: string;
    bio: string;
    social_links: string; // JSON
    is_active: number; // 0 = false, 1 = true
    created_at?: string;
    updated_at?: string;
}

// ? means optional
export interface Story {
    id?: number;
    title: string;
    content: string;
    author_id: number;
    views_count?: number;
    is_hidden?: number; // 0 = false, 1 = true
    image_path?: string;
    created_at?: string;
    updated_at?: string;
}
