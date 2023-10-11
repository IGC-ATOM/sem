<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="HomePage.aspx.vb" Inherits="Connectivity.HomePage" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
        </div>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" Width="466px">
        </asp:GridView>
        <asp:Button ID="Button1" runat="server" Text="Insert" />
        <br />
        <asp:Button ID="Button2" runat="server" Text="Update" />
        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
        <br />
        <asp:Button ID="Button3" runat="server" Text="Delete" />
        <asp:TextBox ID="TextBox1" runat="server" Width="131px"></asp:TextBox>
        <br />
        <br />
        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
        <br />
        <br />
        <br />
        <br />
    </form>
</body>
</html>
