<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>supermaket – Approvisionnement</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Syne', 'sans-serif'],
            body: ['DM Sans', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0fdf6', 100: '#dcfce9', 500: '#16a34a', 600: '#15803d', 700: '#166534', 900: '#052e16',
            },
            surface: {
              50: '#f8fafc', 100: '#f1f5f9', 200: '#e2e8f0', 800: '#1e293b', 900: '#0f172a', 950: '#020617',
            }
          }
        }
      }
    }
  </script>

  <style>
    body { font-family: 'DM Sans', sans-serif; }
    h1,h2,h3,h4,.font-display { font-family: 'Syne', sans-serif; }
    .nav-item.active {
      background: linear-gradient(135deg, #16a34a22, #16a34a11);
      border-left: 3px solid #16a34a;
      color: #16a34a;
    }
    .nav-item:not(.active):hover {
      background: #1e293b;
      color: #cbd5e1;
    }
    .modal-overlay { display:none; }
    .modal-overlay.open { display:flex; }
    .badge-pending { background:#fef9c3; color:#854d0e; }
    .badge-confirmed { background:#dbeafe; color:#1e40af; }
    .badge-received { background:#dcfce7; color:#166534; }
    .badge-cancelled { background:#fee2e2; color:#991b1b; }
    .card-hover { transition: box-shadow .2s, transform .2s; }
    .card-hover:hover { box-shadow: 0 8px 30px #0002; transform: translateY(-2px); }
    tr.row-hover:hover td { background:#f0fdf6; }
    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-track { background:#f1f5f9; }
    ::-webkit-scrollbar-thumb { background:#cbd5e1; border-radius:99px; }
    @keyframes pulse-dot { 0%,100%{opacity:1} 50%{opacity:.4} }
    .dot-anim { animation: pulse-dot 1.8s infinite; }
  </style>
</head>