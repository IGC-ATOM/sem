<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="HomePage2.aspx.vb" Inherits="Connectivity.HomePage2" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
        </div>
        <asp:GridView ID="GridView1" runat="server">
        </asp:GridView>
        <p>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
        </p>
        <p>
            <asp:Button ID="Button1" runat="server" Text="Insert" />
            <asp:Button ID="Button2" runat="server" Text="Update" />
            <asp:Button ID="Button3" runat="server" Text="Delete" />
        </p>
    </form>
</body>
</html>
