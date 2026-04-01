.social-floating {
position: fixed;
right: 24px;
bottom: 24px;
display: grid;
gap: 12px;
z-index: 1100;
}

.social-button {
width: 50px;
height: 50px;
border-radius: 18px;
display: grid;
place-items: center;
color: #fff;
text-decoration: none;
box-shadow: 0 18px 40px rgba(0, 0, 0, .22);
transition: transform .2s, opacity .2s;
}

.social-button:hover {
transform: translateY(-2px);
opacity: .95;
}

.social-button.facebook {
background: #1877f2;
}

.social-button.instagram {
background: radial-gradient(circle at 30% 30%, #feda75 0%, #d62976 30%, #962fbf 60%, #4f5bd5 100%);
}

.social-button.whatsapp {
background: #25d366;
}

.social-button svg {
width: 22px;
height: 22px;
}